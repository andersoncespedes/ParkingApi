<?php
namespace  App\Interface;
interface IUnitOfWork{
    public function Cargo() : ICargo;
    public function Direccion() : IDireccion;
    public function Funcionario() : IFuncionario;
    public function Oficio() : IOficio;
    public function Parroquia() : IParroquia;
    public function Rol() : IRol;
    public function Solicitud() : ISolicitud;
    public function User() : IUser;
    public function Solicitante() : ISolicitante;
}
