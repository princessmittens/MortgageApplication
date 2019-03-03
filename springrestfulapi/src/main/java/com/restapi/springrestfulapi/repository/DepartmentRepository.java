package com.restapi.springrestfulapi.repository;

import com.restapi.springrestfulapi.model.Department;
import org.springframework.data.jpa.repository.JpaRepository;

public interface DepartmentRepository extends JpaRepository<Department, String> {

}