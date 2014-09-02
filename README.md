Projeto PWEB 1

TASKS

Desenvolver um sistema Web, em PHP, para o cadastro de filmes produzidos por uma determinada produtora. Deverão ser cadastrados, também, os usuários do sistema.

        OK - Filmes(codigo, titulo, genero, data_lançamento).
        OK - Usuarios(codigo, login, nome, senha)

O sistema deverá atender aos seguintes requisitos:

Sobre o cadastro do usuário:
OK - A inclusão deverá incluir login/senha (verificando se o login já existe).
OK - A senha deverá ser inserida no bando de dados, já criptografada com MD5.

Sobre o cadastro dos filmes:
Apenas usuários logados poderão:
OK - Cadastrar filmes;
OK - O usuário poderá enviar uma imagem do poster do filme.
OK - Listar filmes cadastrados, exibindo seus dados e suas imagens;
OK - Alterar os dados de algum filme;
OK - Há duas possíveis formas para cadastrar um filme: preenchendo formulário e importando dados de um XML (submetido via upload).
OK - Os dados dos filmes deverão ser validados com expressões regulares, antes de sua inserção no banco de dados.
OK - Usar consultas parametrizadas para inserções e atualizações de dados.
OK - O sistema deverá possuir um controle de login, com controle de sessões em TODAS as páginas que deverão acesso restrito ao usuário.
OK - O sistema deverá disponibilizar para download dos dados dos filmes em XML e CSV.
OK - As informações necessárias a conexão com o SGBD deverão estar em um arquivo XML.
IN PROGRESS - Deverá existir alguma funcionalidade com AJAX.