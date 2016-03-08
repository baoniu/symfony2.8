<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 16/3/4
 * Time: 下午8:46
 */

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;

class Builder{
    public function navMenu(FactoryInterface $factory,array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class','nav navbar-nav');

        $menu->addChild('Home',[
            'route'=>'homepage',
            'label'=>'首页',
        ]);

        $menu->addChild('FindPerson',[
            'route'=>'post_new_person',
            'label'=>'寻人平台',
        ]);

        $menu->addChild('FindPerson',[
            'route'=>'BloggerBlogBundle_index',
            'label'=>'博客页面',
        ]);

        $menu->addChild('news',[
            'route'=>'news_index',
            'label'=>'新闻'
        ]);

        return $menu;
    }
}