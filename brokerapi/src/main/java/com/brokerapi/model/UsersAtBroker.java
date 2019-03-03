package com.brokerapi.model;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.EntityListeners;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;
import javax.validation.constraints.NotNull;

import org.springframework.data.jpa.domain.support.AuditingEntityListener;

@Entity
@Table(name = "UsersAtBroker")
@EntityListeners(AuditingEntityListener.class)
public class UsersAtBroker {
	
	@Id
	@Column(name = "`user_ID`")
	@GeneratedValue(strategy=GenerationType.AUTO)
	private int user_ID;
	
	@Column(name = "`user_emailID`")
	private String user_emailID;
	
	@Column(name = "`user_name`")
	private String user_name;
	
	@Column(name = "`user_password`")
	private String user_password;
	
	@Column(name = "`user_employer`")
	private String user_employer;
	
	@Column(name = "`user_address`")
	private String user_address;
	
	@Column(name = "`user_postalCode`")
	private String user_postalCode;
	
	@Column(name = "`user_phoneNumber`")
	private String user_phoneNumber;
	
	@Column(name = "`user_salary`")
	private String user_salary;
	
	@Column(name = "`user_empStartDate`")
	private String user_empStartDate;
	
	@Column(name = "`user_approvalStatus`")
	private String user_approvalStatus;

	public int getUser_ID() {
		return user_ID;
	}

	public void setUser_ID(int user_ID) {
		this.user_ID = user_ID;
	}

	public String getUser_emailID() {
		return user_emailID;
	}

	public void setUser_emailID(String user_emailID) {
		this.user_emailID = user_emailID;
	}

	public String getUser_name() {
		return user_name;
	}

	public void setUser_name(String user_name) {
		this.user_name = user_name;
	}

	public String getUser_password() {
		return user_password;
	}

	public void setUser_password(String user_password) {
		this.user_password = user_password;
	}

	public String getUser_employer() {
		return user_employer;
	}

	public void setUser_employer(String user_employer) {
		this.user_employer = user_employer;
	}

	public String getUser_address() {
		return user_address;
	}

	public void setUser_address(String user_address) {
		this.user_address = user_address;
	}

	public String getUser_postalCode() {
		return user_postalCode;
	}

	public void setUser_postalCode(String user_postalCode) {
		this.user_postalCode = user_postalCode;
	}

	public String getUser_phoneNumber() {
		return user_phoneNumber;
	}

	public void setUser_phoneNumber(String user_phoneNumber) {
		this.user_phoneNumber = user_phoneNumber;
	}

	public String getUser_salary() {
		return user_salary;
	}

	public void setUser_salary(String user_salary) {
		this.user_salary = user_salary;
	}

	public String getUser_empStartDate() {
		return user_empStartDate;
	}

	public void setUser_empStartDate(String user_empStartDate) {
		this.user_empStartDate = user_empStartDate;
	}

	public String getUser_approvalStatus() {
		return user_approvalStatus;
	}

	public void setUser_approvalStatus(String user_approvalStatus) {
		this.user_approvalStatus = user_approvalStatus;
	}	
}
