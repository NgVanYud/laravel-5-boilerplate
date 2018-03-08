<?php
/**
 * Created by PhpStorm.
 * User: duynv
 * Date: 3/8/2018
 * Time: 1:28 AM
 */
namespace App\Models\Traits\Post;

trait PostAttribute {

    public function getActivedLabelAttribute() {
        if($this->isActived()) {
            return '<a href="'.route('backend.post.status', $this->slug).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.access.posts.activate').'" name="confirm_item"><span class="badge badge-success" style="cursor:pointer">'.__('labels.general.yes').'</span></a>';

        } else {
            return '<a href="'.route('backend.post.status', $this->slug).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.access.posts.deactivate').'" name="confirm_item"><span class="badge badge-danger" style="cursor:pointer">'.__('labels.general.no').'</span></a>';
        }
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('backend.post.edit', $this->slug).'" class="btn btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<a href="'.route('backend.post.destroy', $this->slug).'"
			 data-method="delete"
			 data-trans-button-cancel="'.__('buttons.general.cancel').'"
			 data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
			 data-trans-title="'.__('strings.backend.general.are_you_sure').'"
			 class="btn btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.delete').'"></i></a> ';
    }

    public function getActionButtonsAttribute() {
        return '<div class="btn-group btn-group-sm" role="group" aria-label="Category Actions">
			  '.$this->edit_button.'
			  '.$this->delete_button.'
			</div>';
    }
}