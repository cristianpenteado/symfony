# Projeto em Symfony

## Criando o Projeto

```sh
 symfony new nome-da-aplicacao
```

## Executando a aplicação

```sh
 cd nome-da-aplicacao
 symfony serve # ou symfony server:start
```

## Usando annotations para as rotas

Como alternativa para o _routes.yaml_ é possível utilizar anotações para definir rotas:

```php
...
use use Symfony\Component\Routing\Annotation\Route;

class DefaultController
{

/**
 * @Route("/")
 */

...
```

É necessário instalar a seguinte dependência:

```sh
 composer require annotations # ou composer req annotations
```

## Utiliando um template Engine _Twig_

Realizando a instalação:

```sh
composer req twig
```

Adicionando a seguinte importação:

```php
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
```

E também extendendo a classe _DefaultController_

```php
class DefaultController extends AbstractController
```

Tem a disposição o método _render()_ que recebe como parâmetro um arquivo dentro da pasta _templates/_ na raíz do projeto como twig template

```php
    /**
     * @Route("/")
     */
    public function index ()
    {
        return $this->render("index.html.twig");
    }
```

## Configurando o Banco de dados MYSQL

```sh
composer req orm
```

Dentro do arquivo _.env_  existe uma url para conexão com o MySQL:

DATABASE_URL=mysql://user:password@127.0.0.1:3306/nome-do-banco


Criando a base de dados

```sh
 bin/console doctrine:database:create
 ```

### Em casos de erro ao acesso à base de dados, modifique a senha do root

 ```sh
 ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'sua-senha';
 flush privileges;
 ```

## Geração Automática de Entidades, Controllers

Instalação

```sh
sudo composer req maker --dev
```

Criando uma entidade

```sh
bin/console make:entity
```

Em seguida definimos os atributos como nome, tipo, null...

Criando a migration da Entidade

```sh
sudo bin/console make:migration
```

Executando a migration

```sh
bin/console doctrine:migrations:migrate
```

Criando um Controller

```sh
bin/console make:controller
```
