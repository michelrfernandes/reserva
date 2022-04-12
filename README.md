# 🚗Sistema de Reservas
 Sistema simples de reserva de veículos e sala de reunião.
 ---
 
 __1) Passo__
 
 Baixar os arquivos do repositório;
 
 __2) Passo__
 
 Subir o banco de dados `banco_reserva.sql` que está dentro da pasta __reservas__.
 
  __3) Passo__
 
 Acesse a pasta /conexao/conecta.php e alteras as configurações do seu banco de dados:
 
`		$conexao = new PDO ('mysql:host=localhost; dbname=reserva','root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));`
 
 
 ### Acesso ao sistema:
 
 * Usuario: __adm@adm.com__
 * Senha: __admin__


__Ao entra no sistema, clique no menu (Reserva de veículos) e clique no calendário(data) na qual queira fazer a reserva e cadastre uma.__
