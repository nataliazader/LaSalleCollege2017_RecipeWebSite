<?php
class Recipe extends Controller{
	protected function Index(){
		$viewmodel = new RecipeModel();
		$this->returnView($viewmodel->Index(), true);
	}
}