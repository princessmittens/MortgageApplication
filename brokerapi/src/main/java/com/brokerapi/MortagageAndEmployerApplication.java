package com.brokerapi;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.ComponentScan;
import org.springframework.data.jpa.repository.config.EnableJpaAuditing;

@SpringBootApplication
@EnableJpaAuditing
@ComponentScan(basePackages = {"com.brokerapi.controller","com.brokerapi.DAO","com.brokerapi.model","com.brokerapi.Repository"})
public class MortagageAndEmployerApplication {

	public static void main(String[] args) {
		SpringApplication.run(MortagageAndEmployerApplication.class, args);
	}

}
