<?php

/*
 * This file is part of Flarum.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

namespace Flarum\Notification\Blueprint;

use Flarum\Database\AbstractModel;
use Flarum\User\User;

/**
 * A notification BlueprintInterface, when instantiated, represents a notification about
 * something. The blueprint is used by the NotificationSyncer to commit the
 * notification to the database.
 */
interface BlueprintInterface
{
    /**
     * Get the user that sent the notification.
     *
     * @return User|null
     */
    public function getFromUser(): ?User;

    /**
     * Get the model that is the subject of this activity.
     *
     * @return AbstractModel|null
     */
    public function getSubject(): ?AbstractModel;

    /**
     * Get the data to be stored in the notification.
     *
     * @return mixed
     */
    public function getData(): mixed;

    /**
     * Get the serialized type of this activity.
     *
     * @return string
     */
    public static function getType(): string;

    /**
     * Get the name of the model class for the subject of this activity.
     *
     * @return string
     */
    public static function getSubjectModel(): string;

    /**
     * Whether the blueprint ignores that a user has not verified their email address.
     *
     * @return bool
     */
    public function ignoresUserVerification(): bool;
}
