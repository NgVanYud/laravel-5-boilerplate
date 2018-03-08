<?php
/**
 * Created by PhpStorm.
 * User: duynv
 * Date: 3/7/2018
 * Time: 11:14 PM
 */
namespace App\Models\Traits\Category;

trait CategoryAttribute {


    /**
     * @return string
     */
    public function getActivedLabelAttribute()
    {
        if ($this->isActived()) {

            return '<a href="'.route('backend.category.status', $this->slug).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.access.categories.activate').'" name="confirm_item"><span class="badge badge-success" style="cursor:pointer">'.__('labels.general.yes').'</span></a>';

        }

        return '<a href="'.route('backend.category.status', $this->slug).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.access.categories.deactivate').'" name="confirm_item"><span class="badge badge-danger" style="cursor:pointer">'.__('labels.general.no').'</span></a>';
    }


    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('backend.category.edit', $this->slug).'" class="btn btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<a href="'.route('backend.category.destroy', $this->slug).'"
			 data-method="delete"
			 data-trans-button-cancel="'.__('buttons.general.cancel').'"
			 data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
			 data-trans-title="'.__('strings.backend.general.are_you_sure').'"
			 class="btn btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.delete').'"></i></a> ';
    }


    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
//        if ($this->id == 1) {
//            return 'N/A';
//        }

        return '<div class="btn-group btn-group-sm" role="group" aria-label="Category Actions">
			  '.$this->edit_button.'
			  '.$this->delete_button.'
			</div>';
    }
}