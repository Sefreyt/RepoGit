<?php
App::uses('AppController', 'Controller');
/**
 * Employes Controller
 *
 * @property Employe $Employe
 * @property PaginatorComponent $Paginator
 */
class EmployesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Employe->recursive = 1;
		$this->set('employes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Employe->exists($id)) {
			throw new NotFoundException(__('Invalid employe'));
		}
		$options = array('conditions' => array('Employe.' . $this->Employe->primaryKey => $id));
		$this->set('employe', $this->Employe->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Employe->create();
			if ($this->Employe->save($this->request->data)) {
				$this->Session->setFlash(__('The employe has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employe could not be saved. Please, try again.'));
			}
		}
		$postes = $this->Employe->Poste->find('list');
		$this->set(compact('postes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Employe->exists($id)) {
			throw new NotFoundException(__('Invalid employe'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Employe->save($this->request->data)) {
				$this->Session->setFlash(__('The employe has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employe could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Employe.' . $this->Employe->primaryKey => $id));
			$this->request->data = $this->Employe->find('first', $options);
		}
		$postes = $this->Employe->Poste->find('list');
		$this->set(compact('postes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Employe->id = $id;
		if (!$this->Employe->exists()) {
			throw new NotFoundException(__('Invalid employe'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Employe->delete()) {
			$this->Session->setFlash(__('The employe has been deleted.'));
		} else {
			$this->Session->setFlash(__('The employe could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Employe->recursive = 0;
		$this->set('employes', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Employe->exists($id)) {
			throw new NotFoundException(__('Invalid employe'));
		}
		$options = array('conditions' => array('Employe.' . $this->Employe->primaryKey => $id));
		$this->set('employe', $this->Employe->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Employe->create();
			if ($this->Employe->save($this->request->data)) {
				$this->Session->setFlash(__('The employe has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employe could not be saved. Please, try again.'));
			}
		}
		$postes = $this->Employe->Poste->find('list');
		$this->set(compact('postes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Employe->exists($id)) {
			throw new NotFoundException(__('Invalid employe'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Employe->save($this->request->data)) {
				$this->Session->setFlash(__('The employe has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employe could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Employe.' . $this->Employe->primaryKey => $id));
			$this->request->data = $this->Employe->find('first', $options);
		}
		$postes = $this->Employe->Poste->find('list');
		$this->set(compact('postes'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Employe->id = $id;
		if (!$this->Employe->exists()) {
			throw new NotFoundException(__('Invalid employe'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Employe->delete()) {
			$this->Session->setFlash(__('The employe has been deleted.'));
		} else {
			$this->Session->setFlash(__('The employe could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
