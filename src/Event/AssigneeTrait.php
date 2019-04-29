<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Event;


use TimoReymann\GitlabWebhookLibrary\Entity\User;

trait AssigneeTrait
{
    /**
     * @var User
     */
    private $assignee;

    /**
     * @return User
     */
    public function getAssignee()
    {
        if ($this->assignee == null) {
            $a = $this->getRootAttribute("assignee");
            $this->assignee = new User(
                $a['name'],
                $a['username'],
                $a['avatar_url'],
               array_key_exists('email',$a) ? $a['email'] : null
            );
        }

        return $this->assignee;
    }
}