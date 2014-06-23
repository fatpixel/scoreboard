<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

/**
 * Class Player
 */
class Player extends Eloquent
{
    use SoftDeletingTrait;

    /**
     * @var bool
     */
    public $timestamps = true;
    /**
     * @var string
     */
    protected $table = 'players';

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];
    /**
     * @var array
     */
    protected $guarded = ['highscore'];
    /**
     * @var array
     */
    protected $fillable = ['name'];
    /**
     * @var array
     */
    protected $visible = ['id', 'name', 'highscore'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function scores()
    {
        return $this->hasMany('Score');
    }

    /**
     * @param int $points
     *
     * @return $this
     */
    public function awardPoints($points)
    {
        $points = max(0, intval($points));

        $this->highscore = ($this->highscore ?: 0) + $points;

        return $this;
    }
}
