package com.restapi.springrestfulapi;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.boot.autoconfigure.domain.EntityScan;
import org.springframework.data.jpa.repository.config.EnableJpaAuditing;

@SpringBootApplication(scanBasePackages = {"com.restapi.springrestfulapi.model", "com.restapi.springrestfulapi.dao", "com.restapi.springrestfulapi.controller", "com.restapi.springrestfulapi.repository"})
@EnableJpaAuditing
public class EmployeeApplication {

	public static void main(String[] args) {
		SpringApplication.run(EmployeeApplication.class, args);
	}

}
