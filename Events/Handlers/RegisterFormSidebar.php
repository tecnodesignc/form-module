<?php

namespace Modules\Form\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
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
            $group->item(trans('form::common.form'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('form::forms.title.forms'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.form.form.create');
                    $item->route('admin.form.form.index');
                    $item->authorize(
                        $this->auth->hasAccess('form.forms.index')
                    );
                });
                $item->item(trans('form::fields.title.fields'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.form.field.create');
                    $item->route('admin.form.field.index');
                    $item->authorize(
                        $this->auth->hasAccess('form.fields.index')
                    );
                });
                $item->item(trans('form::leads.title.leads'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.form.lead.create');
                    $item->route('admin.form.lead.index');
                    $item->authorize(
                        $this->auth->hasAccess('form.leads.index')
                    );
                });
// append



            });
        });

        return $menu;
    }
}
