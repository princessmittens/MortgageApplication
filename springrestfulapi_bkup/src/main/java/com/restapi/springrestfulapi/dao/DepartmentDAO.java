package com.restapi.springrestfulapi.dao;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.restapi.springrestfulapi.model.Department;
import com.restapi.springrestfulapi.repository.DepartmentRepository;


@Service
public class DepartmentDAO {

	@Autowired
	DepartmentRepository departmentRepository;
	
	/* to save a department */
	public Department save(Department dept) {
		return departmentRepository.save(dept);
	}
	
	/* search all departments */
	public List<Department> findAll(){
		return departmentRepository.findAll();
	}
	
	/* get a department */
	public Department findOne(String depId) {
		return departmentRepository.getOne(depId);
	}
	
	
	/* delete a department */
	public void delete(Department dept) {
		departmentRepository.delete(dept);
	}
}

