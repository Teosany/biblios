<?php

namespace App\Factory;

use App\Entity\Article;
use Doctrine\ORM\EntityRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Article>
 *
 * @method        Article|Proxy                    create(array|callable $attributes = [])
 * @method static Article|Proxy                    createOne(array $attributes = [])
 * @method static Article|Proxy                    find(object|array|mixed $criteria)
 * @method static Article|Proxy                    findOrCreate(array $attributes)
 * @method static Article|Proxy                    first(string $sortedField = 'id')
 * @method static Article|Proxy                    last(string $sortedField = 'id')
 * @method static Article|Proxy                    random(array $attributes = [])
 * @method static Article|Proxy                    randomOrCreate(array $attributes = [])
 * @method static EntityRepository|RepositoryProxy repository()
 * @method static Article[]|Proxy[]                all()
 * @method static Article[]|Proxy[]                createMany(int $number, array|callable $attributes = [])
 * @method static Article[]|Proxy[]                createSequence(iterable|callable $sequence)
 * @method static Article[]|Proxy[]                findBy(array $attributes)
 * @method static Article[]|Proxy[]                randomRange(int $min, int $max, array $attributes = [])
 * @method static Article[]|Proxy[]                randomSet(int $number, array $attributes = [])
 */
final class ArticleFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'author' => self::faker()->text(),
            'content' => self::faker()->text(),
            'title' => self::faker()->text(),
            'title2' => self::faker()->text(),
            'title3' => self::faker()->text(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Article $article): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Article::class;
    }
}