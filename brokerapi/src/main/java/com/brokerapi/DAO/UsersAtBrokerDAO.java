package com.brokerapi.DAO;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.brokerapi.Reposiroty.BrokerRepository;
import com.brokerapi.model.UsersAtBroker;

@Service
public class UsersAtBrokerDAO {
	
	UsersAtBrokerDAO()
	{
		
	}

	@Autowired
	BrokerRepository brokerRepository;
	
	// to save an employee
	public UsersAtBroker save(UsersAtBroker user) {
		return brokerRepository.save(user);
	}
	
	public List<UsersAtBroker> findAll(){
		return brokerRepository.findAll();
	} 

	// update an emloyee

	// get an employee
	public UsersAtBroker getOne(int empid) {
		return brokerRepository.getOne(empid);
	}

	// delete an employee
	public void delete(UsersAtBroker emp) {
		brokerRepository.delete(emp);
	}
}
