package com.Employer;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.ComponentScan;
import org.springframework.data.jpa.repository.config.EnableJpaAuditing;

@SpringBootApplication
@EnableJpaAuditing
@ComponentScan(basePackages = {"com.Employer.Controller","com.Employer.DAO","com.Employer.model","com.Employer.Repository"})
public class EmployerApplication {

	public static void main(String[] args) {
		SpringApplication.run(EmployerApplication.class, args);
	}

}
