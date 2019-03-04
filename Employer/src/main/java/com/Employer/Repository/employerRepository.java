package com.Employer.Repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.Employer.model.Employee;


@Repository
public interface employerRepository extends JpaRepository<Employee, String> {

}
