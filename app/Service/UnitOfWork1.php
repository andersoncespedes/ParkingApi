<?php
namespace App\Service;
use App\Interface\IUnitOfWork;
use App\Interface\ICargo;
use App\Interface\IDireccion;
use App\Interface\IFuncionario;
use App\Interface\IOficio;
use App\Interface\IParroquia;
use App\Interface\IRol;
use App\Interface\ISolicitud;
use App\Interface\IUser;
use App\Interface\ISolicitante;

use App\Models\Cargo;
use App\Models\Direccion;
use App\Models\Funcionario;
use App\Models\Oficio;
use App\Models\Parroquia;
use App\Models\Rol;
use App\Models\Solicitante;
use App\Models\Solicitud;
use App\Models\User;
use App\Repositories\CargoRepository;
use App\Repositories\DireccionRepository;
use App\Repositories\FuncionarioRepository;
use App\Repositories\OficioRepository;
use App\Repositories\ParroquiaRepository;
use App\Repositories\RolRepository;
use App\Repositories\SolicitanteRepository;
use App\Repositories\SolicitudRepository;
use App\Repositories\UserRepository;

class UnitOfWork1 implements IUnitOfWork{
    private Cargo $_cargo;
    private Direccion $_direccion;
    private Funcionario $_funcionario;
    private Oficio $_oficio;
    private Parroquia $_parroquia;
    private Rol $_rol;
    private Solicitud $_solicitud;
    private User $_user;
    private Solicitante $_solicitante;
    public function __construct(Cargo $cargo, Direccion $direccion, Funcionario $funcionario, Oficio $oficio, Parroquia $parroquia, Rol $rol, Solicitud $solicitud, User $user, Solicitante $solicitante)
    {
        $this->_cargo = $cargo;
        $this->_direccion = $direccion;
        $this->_funcionario = $funcionario;
        $this->_oficio = $oficio;
        $this->_parroquia = $parroquia;
        $this->_rol = $rol;
        $this->_solicitud = $solicitud;
        $this->_user = $user;
        $this->_rol = $rol;
    }
    public function Cargo() : ICargo{
        $_cargo ??= new CargoRepository($this->_cargo);
        return $_cargo;
    }
    public function Direccion() : IDireccion{
        $_direccion ??= new DireccionRepository($this->_direccion);
        return $_direccion;
    }
    public function Funcionario() : IFuncionario{
        $_funcionario ??=new FuncionarioRepository($this->_funcionario);
        return $_funcionario;
    }
    public function Oficio() : IOficio{
        $_oficio ??= new OficioRepository($this->_oficio);
        return $_oficio;
    }
    public function Parroquia() : IParroquia{
        $_parroquia ??= new ParroquiaRepository($this->_parroquia);
        return $_parroquia;
    }
    public function Rol() : IRol{
        $_rol ??= new RolRepository($this->_rol);
        return $_rol;
    }
    public function Solicitud() : ISolicitud{
        $_solicitud ??= new SolicitudRepository($this->_solicitud);
        return $_solicitud;
    }
    public function User() : IUser{
        $_user ??= new UserRepository($this->_user);
        return $_user;
    }
    public function Solicitante() : ISolicitante{
        $_solicitante??= new SolicitanteRepository($this->_solicitante);
        return $_solicitante;
    }
}