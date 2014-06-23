<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Score
 */
class Score extends Eloquent
{

    /**
     * @var bool
     */
    public $timestamps = true;
    /**
     * @var string
     */
    protected $table = 'scores';
    /**
     * @var array
     */
    protected $fillable = ['points','player_id'];
    /**
     * @var array
     */
    protected $visible = ['points','player_id'];

}
