<?php

namespace Modules\Form\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Badge;
use Modules\Core\Events\BuildingSidebar;
use Modules\Form\Repositories\FormRepository;
use Modules\User\Contracts\Authentication;

class RegisterFormSidebar implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    public function handle(BuildingSidebar $sidebar)
    {
        $sidebar->add($this->extendWith($sidebar->getMenu()));
    }

    /**
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {

            $group->item(trans('form::forms.title.forms'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(0);
                $item->badge(function (Badge $badge, FormRepository $formRepository) {
                    $badge->setClass('bg-green');
                    $badge->setValue($formRepository->all()->count());
                });
                $item->route('admin.form.form.index');
                $item->authorize(
                    $this->auth->hasAccess('form.forms.index')
                );
            });

        });

        return $menu;
    }
}
