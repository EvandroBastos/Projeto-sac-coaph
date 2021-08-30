<?php
class ProtocoloService
{
    public function Salvar($request){
        $cliente =  Client::Salvar($request);
        $dados   = Protocolo::Salvar($request, $cliente);
        $assuntos = Assunto:Salvar($reuqest, $protocolo);
        $motivos = MotivoLigacao::Salvar($request, $protocolo);
    }



}
