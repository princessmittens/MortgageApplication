package com.brokerapi.controller;

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

import com.brokerapi.DAO.UsersAtBrokerDAO;
import com.brokerapi.model.UsersAtBroker;

@RestController
@RequestMapping("/mortagageBroker")
public class BrokerController {

	@Autowired
	UsersAtBrokerDAO usersAtBrokerDAO;

	@PostMapping("/usersAtBroker")
	public UsersAtBroker createEmployee(
			@Valid @RequestBody UsersAtBroker usersAtBroker) {
		return usersAtBrokerDAO.save(usersAtBroker);
	}

	// get all departments
	@GetMapping("/usersAtBroker")
	public List<UsersAtBroker> getAllDepartments() {
		return usersAtBrokerDAO.findAll();
	}

	// get employee by depid
	@GetMapping("/usersAtBroker/{id}")
	public ResponseEntity<UsersAtBroker> getemployeeById(
			@PathVariable(value = "id") int empid) {

		UsersAtBroker usersAtBroker = usersAtBrokerDAO.getOne(empid);
		// System.out.println(empid);
		if (usersAtBroker == null) {
			return ResponseEntity.notFound().build();
		}
		return ResponseEntity.ok().body(usersAtBroker);
	}

	/* update an employee by depid */
	@PutMapping("/usersAtBroker/{id}")
	public ResponseEntity<UsersAtBroker> updateDepartment(
			@PathVariable(value = "id") int depid,
			@Valid @RequestBody UsersAtBroker usersAtBrokerDetails) {

		UsersAtBroker userAtBroker = usersAtBrokerDAO.getOne(depid);
		if (userAtBroker == null) {
			return ResponseEntity.notFound().build();
		}

		userAtBroker.setUser_emailID(usersAtBrokerDetails.getUser_emailID());
		userAtBroker.setUser_address(usersAtBrokerDetails.getUser_address());
		userAtBroker.setUser_employer(usersAtBrokerDetails.getUser_employer());
		userAtBroker.setUser_empStartDate(
				usersAtBrokerDetails.getUser_empStartDate());
		userAtBroker.setUser_name(usersAtBrokerDetails.getUser_name());
		userAtBroker.setUser_phoneNumber(
				usersAtBrokerDetails.getUser_phoneNumber());
		userAtBroker
				.setUser_postalCode(usersAtBrokerDetails.getUser_postalCode());
		userAtBroker.setUser_salary(usersAtBrokerDetails.getUser_salary());
		userAtBroker.setUser_approvalStatus(usersAtBrokerDetails.getUser_approvalStatus());

		UsersAtBroker updatedUser = usersAtBrokerDAO.save(userAtBroker);
		return ResponseEntity.ok().body(updatedUser);
	}

	/* Delete an department */
	@DeleteMapping("/usersAtBroker/{id}")
	public ResponseEntity<UsersAtBroker> deleteDepartment(
			@PathVariable(value = "id") int uderID) {

		UsersAtBroker user = usersAtBrokerDAO.getOne(uderID);
		if (user == null) {
			return ResponseEntity.notFound().build();
		}
		usersAtBrokerDAO.delete(user);

		return ResponseEntity.ok().build();
	}
}
