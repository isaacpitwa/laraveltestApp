<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/','ValidationController@showform');
Route::post('/', 'ValidationController@validateform');*/

Route::get('/registration',array('before' => 'csrf',function(){
    $rules = array(
        'email' => 'required|email|unique:users',
        'password' => 'required|same:password_confirm',
        'name' => 'required');
        $validation = Validator::make(Input::all(), $rules);
        if ($validation->fails())
        {
        return Redirect::to('registration')->withErrors
         ($validation)->withInput();
        }
        $user = new User;
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->name = Input::get('name');
        $user->admin = Input::get('admin') ? 1 : 0;
        if ($user->save())
        {
        Auth::loginUsingId($user->id);
        return Redirect::to('profile');
        }
        return Redirect::to('registration')->withInput();
}));

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('profile', function()
{
if (Auth::check())
{
return 'Welcome! You have been authorized!';
}
else
{
return 'Please <a href="login2">Login</a>';
}
});
Route::get('login2', function()
{
    $user = array(
        'username' => Input::get('email'),
        'password' => Input::get('password')
        );
        if (Auth::attempt($user))
        {
        return Redirect::to('profile');
        }
        return Redirect::to('login2')->with('login_error',
        'Could not log in.');
});

