<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /*We can customise the default table and column names and some other stuff, if we want, 
        which is there by default. [MN - 11.06.2020]*/
    //Originally this class is empty and provide default functionality as defined in Model superclass.
    //Table name can be customized
    protected $table = 'posts';
    //Primary key can be changed / defined
    public $primarykey = 'id';
    //To enable created_at and updated_at timestamps, set it to true.
    public $timestamps = true;

    /*Post belonging to a user. Besides this we will create a function "posts()" in User.php (User Model).
        From here we will go to User.php to add some code there. 21.04.2020*/
    public function user(){
        //$posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return $this->belongsTo('App\User');
    }
    
}
