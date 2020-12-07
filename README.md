# Users Posts - Uma simples aplicação para treinar Laravel Framework

Esta aplicação tem basicamente duas sessões, Usuários e Posts.
Basicamente, o usuário poderá criar uma conta(registrar-se) e criar posts que recebem os seguintes parâmetros:
``` 
** Título **
** Sub-título **
** Conteúdo **
** Arquivos(opicional) **
```

Nesta simples aplicação, você poderá ver como utilizar conceitos importantes e poderosos do Laravel, como Laravel Mix, Relacionamentos entre Modelos, Migrations, Upload e Download de Arquivos e outras ferramentas úteis como AJAX, jQuery, SASS e etc.

Penso em acrescentar mais coisas ao longo do tempo, melhorias de layout, exibição dos conteúdos, ACL(o que é bem simples de ser feito com Laravel), Envio de E-mails, Consumo de serviços externos, e etc. 
``` Aceitando sugestões, rs. ```

# Para rodar o projeto, é bem simples. #
Ao terminar de clonar o projeto, abra o terminal no diretório raiz e rode os seguintes comandos:
```
* composer install *
* npm install *
```
Ao finalizar esse processo, você deve utilizar um banco de dados MySQL e criar um novo Schema (com o nome que quiser, desde que altere no .env).

# Tudo ok até aqui? #
Ótimo, agora você irá rodar o seguinte comando no terminal:
```
* php artisan migrate *
```
Este comando irá criar todas as tabelas e relacionamentos do banco de dados.

Acho que agora você já pode iniciar o servidor e rodar a aplicação!

No seu terminal, digite: 
```
* php artisan serve *
```


# Erros, sugestões, críticas e elogios #
gabrielrbg8@outlook.com - Desenvolvedor FullStack PHP.
