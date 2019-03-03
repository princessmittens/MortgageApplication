package com.restapi.springrestfulapi.model;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.EntityListeners;
import javax.persistence.Id;
import javax.persistence.Table;
import javax.validation.constraints.NotNull;

import org.springframework.data.jpa.domain.support.AuditingEntityListener;

import com.fasterxml.jackson.annotation.JsonCreator;

@Entity
@Table(name="department")
@EntityListeners(AuditingEntityListener.class)
public class Department {

	@Id
	@Column(name="`depId-35`", length=10)
	private String depId;
	
	@NotNull
	@Column(name="`deptName-35`", length = 50)
	private String deptName;
	
	@NotNull
	@Column(name="`deptPh-35`", length=50)
	private String deptPh;

	public String getDepId() {
		return depId;
	}

	public void setDepId(String depId) {
		this.depId = depId;
	}

	public String getDeptName() {
		return deptName;
	}

	public void setDeptName(String deptName) {
		this.deptName = deptName;
	}

	public String getDeptPh() {
		return deptPh;
	}

	public void setDeptPh(String deptPh) {
		this.deptPh = deptPh;
	}

	public Department() {}

	public Department(String depId) {
		this.depId = depId;
	}
	
	public Department(String depId, String deptName, String deptPh) {
		super();
		this.depId = depId;
		this.deptName = deptName;
		this.deptPh = deptPh;
	}
	
	
}

