package com.restapi.springrestfulapi.controller;

import java.util.List;

import javax.validation.Valid;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.restapi.springrestfulapi.dao.DepartmentDAO;
import com.restapi.springrestfulapi.model.Department;

@RestController
@RequestMapping("/cloud")
public class DepartmentController {

	@Autowired
	DepartmentDAO departmentDAO;
	
	/* to save a department */
	
	@PostMapping("/departments")
	public Department createDepartment(@Valid @RequestBody Department dept) {
		return departmentDAO.save(dept);
	}
	
	@GetMapping("/departments")
	public List<Department> getAllDepartments() {
		return departmentDAO.findAll();
	}
	
	@GetMapping("/departments/{id}")
	public ResponseEntity<Department> getDepartmentById(@PathVariable(value="id") String depId) {
		Department dept = departmentDAO.findOne(depId);
		
		if(dept==null) {
			return ResponseEntity.notFound().build();
		}
		
		return ResponseEntity.ok().body(dept);
		
	}
	
	@PutMapping("/departments/{id}")
	public ResponseEntity<Department> updateDepartment(@PathVariable(value="id") String depId, @Valid @RequestBody Department depDetails) {
		Department dept = departmentDAO.findOne(depId);
		
		if(dept == null) {
			return ResponseEntity.notFound().build();
		}
		
		dept.setDeptName(dept.getDeptName());
		dept.setDeptPh(dept.getDeptPh());
		
		Department updateDepartment = departmentDAO.save(dept);
		return ResponseEntity.ok().body(updateDepartment);
	}
	
	@DeleteMapping("/departments/{id}")
	public ResponseEntity<Department> deleteDepartment(@PathVariable(value="id") String depId){
		Department dept = departmentDAO.findOne(depId);
		
		if(dept == null) {
			return ResponseEntity.notFound().build();
		}
		
		return ResponseEntity.ok().build();
		
	}
}
