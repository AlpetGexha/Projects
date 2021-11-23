package StudentMenager;

class Studenti {
	private String _emri;
	private String _mbiemri;
	private String _emriPrindit;
	private String _email; // String Email = "^[\\w-_\\.+]*[\\w-_\\.]\\@([\\w]+\\.)+[\\w]+[\\w]$";
	private String _numriTel; // String Number = "(0/91)?[7-9][0-9]{8}";
	private String _drejtimi;
	private float _notaMesatare;
	// private static int _generateID = 1000;
	private int _id;

	/**
	 * @param Jep flerën e ID-s ({@code int})
	 */
	protected void setId(int value) {
//		_generateID++;
//		this._id = _generateID;
		this._id = value;
	}

	/**
	 * @return Trego flerën e ID-s
	 */
	protected int getId() {
		return this._id;
	}

	/**
	 * @param Merr flerën e Emrit ({@code String})
	 */
	protected void setEmri(String value) {
		this._emri = value;
	}

	/**
	 * @return Trego flerën e Emrit
	 */
	protected String getEmri() {
		return this._emri;
	}

	/**
	 * @param Merr flerën e Mbiemrit ({@code String}
	 */
	protected void setMbiemri(String value) {
		this._mbiemri = value;
	}

	/**
	 * @return Trego flerën e Mbiemrit
	 */
	protected String getMbiemri() {
		return this._mbiemri;
	}

	/**
	 * @param Merr flerën e Emrit të prindit ({@code String}
	 */
	protected void setEmriPrindit(String value) {
		this._emriPrindit = value;
	}

	/**
	 * @return Trego fleren e Emrit të prindit
	 */
	protected String getEmriPrindit() {
		return this._emriPrindit;
	}

	/**
	 * @param Merr flerën e Drejtimit ({@code String}
	 */
	protected void setDrejtimi(String value) {
		this._drejtimi = value;
	}

	/**
	 * @return Trego fleren e Emrit të prindit
	 */
	protected String getDrejtimi() {
		return this._drejtimi;
	}

	/**
	 * @param Merr flerën e Emailit ({@code String})
	 */
	protected void setEmail(String value) {
		this._email = value;
	}

	/**
	 * @return Trego fleren e Emilit
	 */
	protected String getEmail() {
		return this._email;
	}

	/**
	 * @param Trego fleren e Emrit të prindit ( {@code String})
	 */
	protected void setNumber(String value) {
		this._numriTel = value;
	}

	/**
	 * @return Trego fleren e Numrit
	 */
	protected String getNumber() {
		return this._numriTel;
	}

	/**
	 * @param Merr fleren notes mesatare ({@code float})
	 */
	protected void setNotaMesatare(float value) {
		this._notaMesatare = value;
	}

	/**
	 * @return Trego fleren e Notes Mesatare
	 */
	protected double getNotaMesatare() {
		return this._notaMesatare;
	}

}
