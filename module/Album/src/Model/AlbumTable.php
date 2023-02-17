<?php 
namespace Album\Model;
use Laminas\Db\TableGateway\TableGatewayInterface;
use RuntimeException;

class AlbumTable{
    private $tableGateway;
    public function __construct(TableGatewayInterface $tableGateway){
        $this ->tableGateway = $tableGateway;
    }
    public function getAll(){
        return $this -> tableGateway ->select();// Retorna tudo que existe no banco
    } 

    public function getAlbum($id){ //Retorna apenas uma pessoa/album
        $id  = (int) $id; 
        $rowset = $this->tableGateway->select(['id' => $id]); // Busca apenas po ID q eu estou
        $row = $rowset -> corrent();
        if(!$row){
            throw new RuntimeException(sprintf('Não foi encontrado o id %d',$id));
        }
        return $row;
    }
    public function salvarAlbum(Album $album){
        $data = [ //entrada de dados
            'id' => $album->getId(),
            'nome' => $album->getNome(),
            'sobrenome' => $album->getSobrenome(),
            'email' => $album -> getEmail(),
            'situacao' =>$album ->getSituacao(),   
        ];
        $id = (int) $album ->getId();
        if($id == 0){ // Verificacao da existencia do id 
            $this->tableGateway -> insert($data);
            return;
        }
        $this->tableGateway->update($data,['id'=>$id]);//caso exista ele salva
    }    
    public function deleteAlbum(Album $album){
        $data =[];
        
    }
    

}
