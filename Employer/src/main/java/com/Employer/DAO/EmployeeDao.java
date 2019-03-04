package com.Employer.DAO;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.Employer.Repository.employerRepository;
import com.Employer.model.Employee;

@Service
public class EmployeeDao {
	
	EmployeeDao()
	{
		
	}

	@Autowired
	employerRepository employeeRepository;
	
	// to save an employee
	public Employee save(Employee user) {
		return employeeRepository.save(user);
	}
	
	//fetch all employees
	
	public List<Employee> findAll(){
		return employeeRepository.findAll();
	} 


	// get an employee
	public Employee getOne(String empid) {
		return employeeRepository.getOne(empid);
	}

	// delete an employee
	public void delete(Employee emp) {
		employeeRepository.delete(emp);
	}
}
