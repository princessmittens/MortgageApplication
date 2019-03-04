package com.Employer.Controller;

import java.util.List;

import javax.validation.Valid;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.Employer.DAO.EmployeeDao;
import com.Employer.model.Employee;


@RestController
@RequestMapping("/Employer")
public class EmployeeController {
	
	@Autowired
	EmployeeDao employeeDAO;

	@PostMapping("/addEmployee")
	public Employee createEmployee(
			@Valid @RequestBody Employee usersAtBroker) {
		return employeeDAO.save(usersAtBroker);
	}
	
	@GetMapping("/allEmployees")
	public List<Employee> getAllDepartments() {
		return employeeDAO.findAll();
	}
	
	@GetMapping("/Employee/{id}")
	public ResponseEntity<Employee> getemployeeById(
			@PathVariable(value = "id") String empid) {

		Employee usersAtBroker = employeeDAO.getOne(empid);
		// System.out.println(empid);
		if (usersAtBroker == null) {
			return ResponseEntity.notFound().build();
		}
		return ResponseEntity.ok().body(usersAtBroker);
	}
	

}
