<?php
	$links = array(
		array(__t('Users'), '/admin/user/list', 'options' => array('title' => __t('List all users'))),
		array(__t('Add New User'), '/admin/user/list/add', 'options' => array('title' => __t('Add new user'))),
		array(__t('Roles'), '/admin/user/roles', 'options' => array('title' => __t('Allow you to fine tune the security and administration of QuickApps.'))),
		array(__t('Permissions'), '/admin/user/permissions', 'options' => array('title' => __t('Manage permissions by role'))),
		array(__t('Manage Fields'), '/admin/user/fields', 'options' => array('title' => __t('Add, edit, and arrange fields for storing user data.'))),
		array(__t('Manage Display'), '/admin/user/display', 'pattern' => '*/user/display/*', 'options' => array('title' => __t('Configure how fields should be displayed when rendering a user profile page.')))
	);

	echo $this->Layout->toolbar($links);

	if ($this->request->params['controller'] == 'display' && isset($this->data['User']['viewModes'])) {
		$links = array();

		foreach ($this->data['User']['viewModes'] as $vm) {
			$links[] = array(__t($vm), "/admin/user/display/index/{$vm}");
		}

		if (!empty($links)) {
			echo "<p>&nbsp;</p><p>&nbsp;</p><p>" . $this->Layout->toolbar($links) . "</p>";
		}
	}