## Users Posts - Uma simples aplicação em Laravel.


##### Nesta simples aplicação, você poderá ver como utilizar conceitos importantes e poderosos do Laravel, como Queue, Jobs, Envio de Emails, Laravel Mix, Policies, Authentication, Seeders, Relacionamentos entre Modelos, Migrations, Upload e Download de Arquivos e outras ferramentas úteis como AJAX, jQuery, Bootstrap, SASS e etc.

#### Autenticação: Padrão do Laravel/Bootstrap.

Esta aplicação tem basicamente duas sessões, Usuários e Posts.

Basicamente, o usuário poderá criar posts que recebem os seguintes parâmetros:
- *Título - string*
- *Sub-título - string*
- *Conteúdo - string*
- *Arquivos(opicional)- files*

Penso em acrescentar mais coisas ao longo do tempo, melhorias de layout, exibição dos conteúdos, Envio de E-mails, Consumo de serviços externos, e etc. Estou aceitando sugestões!

#### Para rodar o projeto, é bem simples.
Ao terminar de clonar o projeto, abra o terminal no diretório raiz e rode os seguintes comandos:
```
* composer install *
* npm install *
```
Ao finalizar esse processo, você deve utilizar o seridor de banco de dados MySQL e criar um novo Schema (com o nome que quiser, desde que altere no .env).
*- Lembrar de adicionar a seguinte linha ao arquivo .env: __FILESYSTEM_DRIVER=public__*

#### Tudo ok até aqui? #
Ótimo, agora você irá rodar o seguinte comando no terminal:
```
*php artisan migrate*
```
Este comando irá criar todas as tabelas e relacionamentos do banco de dados.

Agora, para criar um usuário administrador(que poderá criar internamente outros usuários), você deve rodar os Seeders do projeto.
Copie as seguintes variáveis de ambiente do arquivo env.example: USER_NAME, USER_EMAIL e USER_PASSWORD.
Cole no seu arquivo .env, e coloque seus respectivos valores(seu nome, seu e-mail e uma senha para fazer login no sistema).
Digite o seguinte comando no terminal:
```
*php artisan db:seed*
```
Isso criará um usuário com o perfil de administrador, com o nome, e-mail e senha que você setou no arquivo .env.

Agora você já pode iniciar o servidor e rodar a aplicação!

No seu terminal, digite: 
```
*php artisan serve*
*php artisan queue:work (para que a queue possa capturar e processar os seus jobs)*
```


#### Mais...
- Ao cadastrar um novo usuário, será disparado um e-mail com a senha para o endereço de e-mail do usuário cadastrado. Para isso, utilizei Queue Jobs do Laravel.
- Utilizei a personalização de tema do Bootstrap para alterar algumas cores ao meu gosto. Para modificar, vá até: *resources/view/scss/style.css*
- As alterações do CSS de todas as views(menos a home.blade.php) são feitas em: *resources/views/layouts/style.css*
    - Estarão marcados por comentários a qual sessão e qual view pertence cada código css no arquivo.
- Para que os arquivos dos posts fiquem disponível para download, você deve criar umm symlink(link simbólico) da storage para public. Segue o comando:
```
* php artisan storage:link
```
### Entendendo a ACL do sistema: 
* O perfil Administrador está configurado como ID = 1 (importante) *

- Na tabela *"users"* tem uma coluna *"profile_id"*, que faz referência a tablea *"profiles"*.
- A tabela *"profiles"* armazena o nome e o id dos perfis(Ex: Administrador(sempre criar com o ID = 1), Usuário Comum, etc...).
- A tabela *"actions"* armazena as actions personalizadas que podem ser criadas pelo usuário, exemplo: enviar um e-mail. (As actions padrões do Laravel não precisam ser criadas, ex: create, update, delte, show...).
- Caso deseje criar e usar uma nova action(ex: usuário enviar um e-mail), você terá que criar um método na Policy Class que diz respeito ao model em que está trabalhando, no mesmo padrão do método *"delete"* da classe PostPolicy, e precisará de um método igual ao mapActions, que também está na classe PostPolicy.
- A tabela *"profile_actions"* associa o perfil com as ações que ele pode realizar no sistema(Exemplo: Administrador pode deletar usuário). Ela recebe o ID do perfil e o ID da ação.

### Erros, sugestões, críticas e elogios ###
gabrielrbg8@outlook.com - Gabriel, Desenvolvedor FullStack PHP.
