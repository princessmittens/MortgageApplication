package com.Employer.model;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.EntityListeners;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;

import org.springframework.data.jpa.domain.support.AuditingEntityListener;

/**
 * @author Nav
 *
 */
@Entity
@Table(name = "Employee_Records")
@EntityListeners(AuditingEntityListener.class)
public class Employee {
	
	@Id
	@Column(name = "`employee_emailID`")
	private String employee_emailID;
	
	@Column(name = "`employee_password`")
	private String employee_password;
	
	@Column(name = "`employee_address`")
	private String employee_address;
	
	@Column(name = "`employee_phoneNumber`")
	private String employee_phoneNumber;
	
	@Column(name = "`employee_salary`")
	private String employee_salary;
	
	@Column(name = "`employee_StartDate`")
	private String employee_StartDate;
	

	public String getEmployee_emailID() {
		return employee_emailID;
	}

	public void setEmployee_emailID(String employee_emailID) {
		this.employee_emailID = employee_emailID;
	}

	public String getEmployee_password() {
		return employee_password;
	}

	public void setEmployee_password(String employee_password) {
		this.employee_password = employee_password;
	}

	public String getEmployee_address() {
		return employee_address;
	}

	public void setEmployee_address(String employee_address) {
		this.employee_address = employee_address;
	}

	public String getEmployee_phoneNumber() {
		return employee_phoneNumber;
	}

	public void setEmployee_phoneNumber(String employee_phoneNumber) {
		this.employee_phoneNumber = employee_phoneNumber;
	}

	public String getEmployee_salary() {
		return employee_salary;
	}

	public void setEmployee_salary(String employee_salary) {
		this.employee_salary = employee_salary;
	}

	public String getEmployee_StartDate() {
		return employee_StartDate;
	}

	public void setEmployee_StartDate(String employee_StartDate) {
		this.employee_StartDate = employee_StartDate;
	}

}
