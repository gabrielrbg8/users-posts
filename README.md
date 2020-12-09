# Users Posts - Uma simples aplicação para treinar Laravel Framework

# Autenticação utilizada: Padrão do Laravel/Bootstrap #

Esta aplicação tem basicamente duas sessões, Usuários e Posts.
Basicamente, o usuário poderá criar uma conta(registrar-se) e criar posts que recebem os seguintes parâmetros:
``` 
** Título - string **
** Sub-título - string **
** Conteúdo - string **
** Arquivos(opicional)- files **
```

Nesta simples aplicação, você poderá ver como utilizar conceitos importantes e poderosos do Laravel, como Laravel Mix, Relacionamentos entre Modelos, Migrations, Upload e Download de Arquivos e outras ferramentas úteis como AJAX, jQuery, Bootstrap, SASS e etc.

Penso em acrescentar mais coisas ao longo do tempo, melhorias de layout, exibição dos conteúdos, ACL(o que é bem simples de ser feito com Laravel), Envio de E-mails, Consumo de serviços externos, e etc. Aceitando sugestões!

# Para rodar o projeto, é bem simples. #
Ao terminar de clonar o projeto, abra o terminal no diretório raiz e rode os seguintes comandos:
```
* composer install *
* npm install *
```
Ao finalizar esse processo, você deve utilizar o seridor de banco de dados MySQL e criar um novo Schema (com o nome que quiser, desde que altere no .env).
- Lembrar de adicionar a seguinte linha ao arquivo .env: FILESYSTEM_DRIVER=public

# Tudo ok até aqui? #
Ótimo, agora você irá rodar o seguinte comando no terminal:
```
* php artisan migrate *
```
Este comando irá criar todas as tabelas e relacionamentos do banco de dados.

Agora você já pode iniciar o servidor e rodar a aplicação!

No seu terminal, digite: 
```
* php artisan serve *
```

# Mais... #
- Utilizei a personalização de tema do Bootstrap para alterar algumas cores ao meu gosto. Para modificar, vá até: resources/view/scss/style.css
- As alterações do CSS de todas as views(menos a home.blade.php) são feitas em: resources/views/layouts/style.css
    - Estarão marcados por comentários a qual sessão e qual view pertence cada código css no arquivo.
- Para que os arquivos dos posts fiquem disponível para download, você deve criar umm symlink(link simbólico) da storage para public. Segue o comando:
```
* php artisan storage:link
```

# Erros, sugestões, críticas e elogios #
gabrielrbg8@outlook.com - Desenvolvedor FullStack PHP.
