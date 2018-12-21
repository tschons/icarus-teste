#### **Tecnologias utilizadas**
- PHP 5.3
- Apache 2.4.37
- MySQL 5.1.45
- Angular 7.1.0
- Bootstrap 4.1.3
- Slim 2.0
- npm 6.4.1

#### **Configurações**
**Back-end**

Para configurar a API, o arquivo .ini está contido no diretório: "questao4/api/config.ini", 
onde são definidas as configurações de conexão com a base de dados.

**Front-end**

Para configurar o endereço da API que será acessada pelo front-end, o arquivo de configuração
encontra-se no diretório: "questao4/client/src/environments/environment.prod.ts".

**Base de dados**

Um arquivo de script com a estrutura da base de dados e alguns registros de exemplo encontra-se em:
"questao4/database/dump.sql"

#### **Requerimentos**

Para a correta execução das rotas da API, é necessário que o módulo mod_rewrite do apache esteja
ativo e o diretório no qual a API está rodando tenha as permissões para executar arquivos
.htaccess, como por exemplo:

```
<Directory "srv/http/icarus" >
    Options Indexes FollowSymLinks
    AllowOverride All
    Order allow,deny
    Allow from all
</Directory>
```

#### **Passos para execução**

1. Extrair arquivo de dump da base de dados;
2. Alterar arquivo de configuração da API com os dados para acesso à base;
3. Checar módulo mod_rewrite e arquivo de configuração do apache com permissões para .htaccess no diretório da API;
4. Alterar arquivo de configuração do front-end especificando a URL da API;
5. Iniciar o front-end rodando o comando `ng serve --open`.