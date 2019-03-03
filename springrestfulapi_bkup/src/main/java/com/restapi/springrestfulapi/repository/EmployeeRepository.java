package com.restapi.springrestfulapi.repository;

import com.restapi.springrestfulapi.model.Employee;
import org.springframework.data.jpa.repository.JpaRepository;


public interface EmployeeRepository extends JpaRepository<Employee, String> {


}