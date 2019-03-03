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

import com.restapi.springrestfulapi.dao.EmployeeDAO;
import com.restapi.springrestfulapi.model.Employee;

@RestController
@RequestMapping("/cloud")
public class EmployeeController {

	@Autowired
	EmployeeDAO employeeDAO;
	
	/* save an employee */
	@PostMapping("/employees")
	public Employee createEmployee(@Valid @RequestBody Employee emp) {
		return employeeDAO.save(emp);
	}
	
	/* get all employees */
	@GetMapping("/employees")
	public List<Employee> getAllEmployees(){
		return employeeDAO.findAll();
	}
	
	/* get employee by a particular Id*/
	@GetMapping("/employees/{id}")
	public ResponseEntity<Employee> getEmployeeById(@PathVariable(value="id") String empId){
		Employee emp = employeeDAO.findOne(empId);
		
		if(emp == null) {
			return ResponseEntity.notFound().build();
		}
		return ResponseEntity.ok().body(emp);
	}
	
	/* Update an employee by empId*/
	
	@PutMapping("/employees/{id}")
	public ResponseEntity<Employee> updateEmployee(@PathVariable(value="id") String empId, @Valid @RequestBody Employee empDetails){
		
		Employee emp = employeeDAO.findOne(empId);
		if(emp == null) {
			return ResponseEntity.notFound().build();
		}
		
		emp.setEmpFirstName(emp.getEmpFirstName());
		emp.setEmpLastName(emp.getEmpLastName());
		emp.setEmpPosition(emp.getEmpPosition());
		emp.setEmpSalary(emp.getEmpSalary());
		emp.setEmpStartDate(emp.getEmpStartDate());
		emp.setEmpDep(emp.getEmpDep());
		
		
		Employee updateEmployee = employeeDAO.save(emp);
		return ResponseEntity.ok().body(updateEmployee);
	}
	
	/* Delete an Employee */
	@DeleteMapping("/employees/{id}")
	public ResponseEntity<Employee> deteleEmployee(@PathVariable(value="id") String empId){
		Employee emp = employeeDAO.findOne(empId);
		
		if(emp == null) {
			return ResponseEntity.notFound().build();
		}
		
		employeeDAO.delete(emp);
		return ResponseEntity.ok().build();
	}
}


