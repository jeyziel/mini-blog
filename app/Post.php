<?php

namespace App;

use App\Comment;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = ['user_id','title','body','image_path'];

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function tags()
	{
		return $this->belongsToMany(Tag::class);
	}

	public function addComment($body)
	{
		// Comment::create([
  //   	    'post_id' => $this->id,
  //   		'body' => request('body')
  //   	]);
		$this->comments()->create([
			'body' => $body,
			'user_id' => auth()->id()
		]);
	}

	public function scopeFilter($query, $filter)
    {
        if (isset($filter['month'])) {
            $query->whereMonth('created_at', Carbon::parse($filter['month'])->month);
        }

        if (isset($filter['year'])) {
            $query->whereYear('created_at', Carbon::parse($filter['year'])->year);
        }
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) publish')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get();
    }


}
