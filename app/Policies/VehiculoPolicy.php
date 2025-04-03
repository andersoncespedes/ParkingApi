<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Vehiculo;
use App\Models\User;

class VehiculoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->isGranted(USER::EMPLEADO_ROL || USER::ADMINISTRADOR_ROL, $user);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Vehiculo $vehiculo = null)
    {
        return $user->isGranted(USER::EMPLEADO_ROL || USER::ADMINISTRADOR_ROL, $user);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->isGranted(USER::EMPLEADO_ROL || USER::ADMINISTRADOR_ROL, $user);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Vehiculo $vehiculo)
    {
        return $user->isGranted(USER::ADMINISTRADOR_ROL, $user);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Vehiculo $vehiculo)
    {
        return $user->isGranted(USER::ADMINISTRADOR_ROL, $user);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Vehiculo $vehiculo)
    {
        return $user->isGranted(USER::ADMINISTRADOR_ROL, $user);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Vehiculo $vehiculo)
    {
        return $user->isGranted(USER::ADMINISTRADOR_ROL, $user);
    }
}
