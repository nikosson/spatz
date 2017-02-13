<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = ['user_id', 'subscription_id', 'subscription_type'];

    /**
     * Create new subscription, if it doesn't exist or delete it
     *
     * @return $this
     */
    public function toggleSubscription()
    {
        if($this->exists) {
            $this->delete();
        } else {
            $this->save();
        }

        return $this;
    }

    /**
     * TODO: rename it
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function subscription()
    {
        return $this->morphTo();
    }

    /**
     * Define if the given subscription belongs to Channel model
     *
     * @return bool
     */
    public function isChannel()
    {
        return $this->subscription_type === Channel::class;
    }

    /**
     * Define if the given subscription belongs to Question model
     *
     * @return bool
     */
    public function isQuestion()
    {
        return $this->subscription_type === Question::class;
    }

    /**
     * Get subscriber(user) from current subscription
     *
     * @return mixed
     */
    public function getSubscriber()
    {
        $subscriber = User::find($this->user_id);

        return $subscriber;
    }

    /**
     * Get subscriber's(user's) email from a given subscription
     *
     * @return mixed
     */
    public function getSubscribersEmail()
    {
        return $this->getSubscriber()->email;
    }

    /**
     * Get title from a given subscription
     *
     * @return mixed
     */
    public function getQuestionsTitle()
    {
        return $this->subscription->title;
    }

    /**
     * Get id from a given subscription
     *
     * @return mixed
     */
    public function getQuestionsId()
    {
        return $this->subscription->id;
    }

    /**
     * Get channel from a given subscription
     *
     * @return mixed
     */
    public function getQuestionsChannel()
    {
        return $this->subscription->channel;
    }

}
