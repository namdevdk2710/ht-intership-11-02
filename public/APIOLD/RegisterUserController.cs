﻿using MusicAPIStore.AES256Encryption;
using MusicAPIStore.Models;
using MusicAPIStore.Repository;
using System;
using System.Web.Mvc;

namespace MusicAPIStore.Controllers
{
    public class RegisterUserController : Controller
    {
        IRegisterUser repository;
        public RegisterUserController()
        {
            repository = new RegisterUserConcrete();
        }

        [HttpGet]
        // GET: RegisterUser/Create
        public ActionResult Create()
        {
            return View(new RegisterUser());
        }

        // POST: RegisterUser/Create
        [HttpPost]
        public ActionResult Create(RegisterUser RegisterUser)
        {
            try
            {
                if (!ModelState.IsValid)
                {
                    return View("Create", RegisterUser);
                }

                // Validating Username 
                if (repository.ValidateUsername(RegisterUser))
                {
                    ModelState.AddModelError("", "User is Already Registered");
                    return View("Create", RegisterUser);
                }
                RegisterUser.CreateOn = DateTime.Now;

                // Encrypting Password with AES 256 Algorithm
                RegisterUser.Password = EncryptionLibrary.EncryptText(RegisterUser.Password);

                // Saving User Details in Database
                repository.Add(RegisterUser);
                TempData["UserMessage"] = "User Registered Successfully";
                ModelState.Clear();
                return View("Create", new RegisterUser());
            }
            catch
            {
                return View();
            }
        }
    }
}
