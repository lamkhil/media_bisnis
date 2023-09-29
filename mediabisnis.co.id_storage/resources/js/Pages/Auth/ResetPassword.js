import React, { useEffect } from 'react';
import Button from '@/Components/Button';
import User from '@/Layouts/User';
import Input from '@/Components/Input';
import Label from '@/Components/Label';
import ValidationErrors from '@/Components/ValidationErrors';
import { Head, useForm } from '@inertiajs/inertia-react';

export default function ResetPassword({ token, email }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        token: token,
        email: email,
        password: '',
        password_confirmation: '',
    });

    useEffect(() => {
        return () => {
            reset('password', 'password_confirmation');
        };
    }, []);

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.value);
    };

    const submit = (e) => {
        e.preventDefault();

        post(route('password.update'));
    };

    return (
        <User>
            <div className="authbg">
                <div className="container auth-container">
                    <div className="col-lg-6 col-md-10 mx-auto shadow authcard">
                        <div className="login-box">
                            <div className="logo-cover d-flex mb-3 align-items-center">
                                <strong> Enter New Password</strong>
                            </div>
                        </div>
        
                    <div className="row">
                        <ValidationErrors errors={errors} />
                            <form onSubmit={submit}>
                                <div className="form-group">
                                    <div className="position-relative has-icon-right">
                                        <Input
                                            type="email"
                                            name="email"
                                            value={data.email}
                                            className="mt-1 block w-full"
                                            autoComplete="username"
                                           
                                            handleChange={onHandleChange}
                                        />
                                    </div>
                                </div>
                                <div className="form-group">
                                    <div className="position-relative has-icon-right">
                                        <Input
                                            type="password"
                                            name="password"
                                            value={data.password}
                                            className="mt-1 block w-full"
                                            autoComplete="new-password"
                                            placeholder="Enter New Password"
                                            isFocused={true}
                                            handleChange={onHandleChange}
                                        />
                                    </div>
                                </div>
                                <div className="form-group">
                                    <div className="position-relative has-icon-right">
                                        <Input
                                            type="password"
                                            name="password_confirmation"
                                            value={data.password_confirmation}
                                            className="mt-1 block w-full"
                                            autoComplete="new-password"
                                            placeholder="Confirm New Password"
                                            handleChange={onHandleChange}
                                        />
                                    </div>
                                </div>
                                <div className="form-group">
                                    <div className="position-relative has-icon-right">
                                        <Button className="btn-primary" processing={processing}>
                                            Reset Password
                                        </Button>
                                    </div>
                                </div>
                            </form> 
                        </div>   
                    </div>  
                </div>
            </div>   
        </User>
    );
}
