<?php
namespace IgniteYourProject\Base\AdminBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class MenuBuilder
 * Admin Menu Bundle
 *
 * @package IgniteYourProject\Base\AdminBundle\Menu
 */
class MenuBuilder
{
    private $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * Sidebar Admin Menu
     *
     * @param Request  $request
     *
     * @return \Knp\Menu\ItemInterface
     */
    public function createBackendSideBarMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttributes(array('class' => 'sidebar-menu'));

        $menu->addChild('Movie', array('uri' => '/admin/movie/'));
        $menu->addChild('Movie Rentals', array('uri' => '/admin/movie/rented/'));
//        $menu->addChild('Movie', array('uri' => $this->generateUrl('admin_movie')));

//        $menu = $this->factory->createItem('root');
//        $menu->setChildrenAttributes(array('class' => 'sidebar-menu'));
//
//        $menu->addChild('Home', array('uri' => '/test'));
//        $menu->addChild('User', array('uri' => '#'))->setAttribute('dropdown', true);
//        $menu['User']->addChild('Profile', array('uri' => '#'))->setAttribute('divider_append', true);
//        $menu->addChild(
//            'About Me',
//            array(
//                'uri' => '/a',
//            )
//        );

//        foreach ($menu->getChildren() as $key => $value) {
//            $menu[$key]->setLinkAttribute('class', 'treeview');
//        }

        return $menu;
    }
}
