<?php
namespace App\Repositories;

use App\Models\User;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\UserContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Hash;
/**
 * Class UserRepository
 *
 * @package \App\Repositories
 */
class UserRepository extends BaseRepository implements UserContract
{
    use UploadAble;

    /**
     * UserRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listUsers($type=1,string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        //return $this->all($columns, $order, $sort);
        $users = User::where('is_deleted','0')->where('type',$type)->get();
        return $users;
    }

     /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findUserById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function getUserDetails(int $id)
    {
        try {
            $user =  Profile::select("profiles.*","users.name as user_name","users.id as userid","users.is_block")
                      ->leftjoin("users", "profiles.user_id", "=", "users.id")
                      ->where('profiles.user_id',$id)
                      ->get();
            //return $this->findOneOrFail($id);

            return $user;

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    /**
     * @param array $params
     * @return User|mixed
     */
    public function createUser(array $params)
    {
        try {

            $collection = collect($params);

            $user = new User;
            $user->name = $collection['name'];
            $user->email = $collection['email'];
            $user->mobile = $collection['mobile'];
            $user->password = hash::make($collection['password']);
            $user->type = $collection['type'];

            $user->save();

            return $user;
            
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateUser(array $params)
    {
        $user = $this->findOneOrFail($params['id']); 
        $collection = collect($params)->except('_token'); 

        $user->name = $collection['name'];
        $user->email = $collection['email'];
        $user->mobile = $collection['mobile'];
        $user->type = $collection['type'];

        $user->save();

        return $user;
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function blockUser($id,$is_block){
        $user = $this->findUserById($id);
        $user->is_block = $is_block;
        $user->save();

        return $user;
    }
    /**
     * @param array $params
     * @return mixed
     */
    public function verify($id,$is_verified){
        $user = $this->findUserById($id);
        $user->is_verified = $is_verified;
        $user->save();

        return $user;
    }

     /**
     * @param array $params
     * @return mixed
     */
    public function updateUserStatus(array $params){
        $user = $this->findOneOrFail($params['id']);
        $collection = collect($params)->except('_token');
        $user->is_active = $collection['is_active'];
        $user->save();

        return $user;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteUser($id)
    {
        $user = $this->findOneOrFail($id);
        $user->delete();
        return $user;
    }
}