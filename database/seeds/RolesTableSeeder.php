<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;
use Blog\User\Model\Role;
use Blog\User\Repository\RoleRepository;

/**
 * @author  Arif Setianto <arifsetiantoo@gmail.com>
 */
class RolesTableSeeder extends Seeder
{
    const roles = [
        [
            'name'  => 'admin',
            'label' => 'Administrator',
        ],
        [
            'name'  => 'guest',
            'label' => 'Guest',
        ],
    ];

    public function run()
    {
        foreach (self::roles as $role) {
            if (null === $this->repository()->findOneBy(['name' => $role['name']])) {
                $role = new Role($role);
                $this->repository()->save($role);
            }
        }
    }

    private function repository(): RoleRepository
    {
        return app(RoleRepository::class);
    }
}