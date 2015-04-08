<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Question extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    public $timestamps = true;
    protected $fillable = ['category', 'question', 'answer', 'ratingscount', 'rating'];
    public $messages;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'questions';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    // protected $hidden = array('password', 'remember_token');


    public function isValid()
    {
        $v = Validator::make($this->attributes, static::$rules);

        if($v->passes())
        {
            return true;
        }

        $this->messages = $v->messages(); //messages where?
        return false;
    }

    public static $rules = [
        'category' => 'required|min:1',
        'question' => 'required|min:6',
        'answer' => 'required|min:1',
    ];
}
